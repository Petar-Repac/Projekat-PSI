"use strict";

(function main() {
  const allPosts = Array.from(document.querySelectorAll(".post")).map($post => {
    const $like = $post.querySelector(".button.like");
    const $dislike = $post.querySelector(".button.dislike");
    const $likeCount = $post.querySelector(".js-like-count");
    const $dislikeCount = $post.querySelector(".js-dislike-count");

    return {
      dom: {
        $post,
        $like,
        $dislike,
        $likeCount,
        $dislikeCount,
      },
      meta: __posts.find(post => post.idPost === Number($post.dataset.id)),
    }
  });

  function repaint(post) {
    post.dom.$likeCount.textContent = post.meta.upvotes;
    post.dom.$dislikeCount.textContent = post.meta.downvotes;

    post.dom.$like.classList.toggle("voted", post.meta.userVote === 1);
    post.dom.$dislike.classList.toggle("voted", post.meta.userVote === -1);
  }

  async function registerVote(post, intendedValue) {
    if (__user === null) {
      location.replace("/login?require_login");
      return;
    }

    const value = intendedValue === post.meta.userVote ? 0 : intendedValue;

    const result = await API.setLikeDislike(__user.id, post.meta.idPost, value);

    const oldUserVote = post.meta.userVote;
    const newUserVote = result.value;
    post.meta.userVote = result.value;

    console.log("Old:" + oldUserVote + " New:" + newUserVote );

    //Logika za lokalno racunanje glasova
    switch(oldUserVote){
        //bio upvote
        case 1:
            //ponisten
            if(newUserVote == 0){
                post.meta.upvotes -= 1; 
            }
            //downvote
            else {
                post.meta.upvotes -= 1;
                post.meta.downvotes += 1; 
            }

            break;
        //bio downvote
        case -1:
            //ponisten
            if(newUserVote== 0){
                post.meta.downvotes -= 1; 
            }
            //upvote
            else {
                post.meta.upvotes += 1;
                post.meta.downvotes -=1; 
            }

            break;
        //nije glasao 
        case 0: 
            //upvote
            if(newUserVote == 1){
                post.meta.upvotes += 1; 
            }
            //downvote
            else {
                post.meta.downvotes += 1; 
            }
            break;
    }
 

    repaint(post);
  }


  allPosts.forEach(post => {
    repaint(post);
    post.dom.$like.addEventListener("click", () => registerVote(post, 1));
    post.dom.$dislike.addEventListener("click", () => registerVote(post, -1));
  });

})();