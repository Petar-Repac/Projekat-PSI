/* Autori: Vukašin Stepanović & Petar Repac */

"use strict";

(function main() {

    //Autor: Vukašin Stepanović
    const DOM = {
        lock: document.querySelector(".js-lock"),
        comment: {
            text: document.querySelector(".js-comment-text"),
            submit: document.querySelector(".js-comment-submit"),
        },
    };

    function redrawLocked(value) {
        DOM.lock.textContent = value ? "Otključaj" : "Zaključaj";
        DOM.comment.text.disabled = value;
        DOM.comment.submit.disabled = value;
    }

    function initLock() {
        DOM.lock.addEventListener("click", async () => {
            const result = await API.setPostLocked(__post.id, !__post.isLocked);

            __post.isLocked = result.value;
            redrawLocked(result.value);
        });

        redrawLocked(__post.isLocked);
    }

    function init() {
        if (DOM.lock) {
            initLock();
        }
    }

    init();

    //Autor: Petar Repac
    const $post =  {
        dom:{
            $like : document.querySelector(".button.like"),
            $dislike : document.querySelector(".button.dislike"),
            $likeCount : document.querySelector(".js-like-count"),
            $dislikeCount : document.querySelector(".js-dislike-count"),
        },
        meta: __post,
    }; 
    
    function repaint() {
        $post.dom.$likeCount.textContent = $post.meta.upvotes;
        $post.dom.$dislikeCount.textContent = $post.meta.downvotes;

        $post.dom.$like.classList.toggle("voted", $post.meta.userVote === 1);
        $post.dom.$dislike.classList.toggle("voted", $post.meta.userVote === -1);
    }
    
      async function registerVote(intendedValue) {
        if (__user === null) {
          location.replace("/login?require_login");
          return;
        }
    
        const value = intendedValue === $post.meta.userVote ? 0 : intendedValue;
    
        console.log(__user.id, $post.meta.id, value);
        const result = await API.setLikeDislike(__user.id, $post.meta.id, value);
    
        const oldUserVote = $post.meta.userVote;
        const newUserVote = result.value;
        $post.meta.userVote = result.value;
    
        console.log("Old:" + oldUserVote + " New:" + newUserVote )
    
        //Logika za lokalno racunanje glasova
        switch(oldUserVote){
            //bio upvote
            case 1:
                //ponisten
                if(newUserVote == 0){
                    $post.meta.upvotes -= 1; 
                }
                //downvote
                else {
                    $post.meta.upvotes -= 1;
                    $post.meta.downvotes += 1; 
                }
    
                break;
            //bio downvote
            case -1:
                //ponisten
                if(newUserVote== 0){
                    $post.meta.downvotes -= 1; 
                }
                //upvote
                else {
                    $post.meta.upvotes += 1;
                    $post.meta.downvotes -=1; 
                }
    
                break;
            //nije glasao 
            case 0: 
                //upvote
                if(newUserVote == 1){
                    $post.meta.upvotes += 1; 
                }
                //downvote
                else {
                    $post.meta.downvotes += 1; 
                }
                break;
        }
     
    
        repaint();
      }
    
     
        repaint();
        $post.dom.$like.addEventListener("click", () => registerVote(1));
        $post.dom.$dislike.addEventListener("click", () => registerVote(-1)); 

})();
