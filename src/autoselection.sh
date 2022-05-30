#!/usr/bin/env bash

# Autor: Vukašin Stepanović

# Staviti u crontab da se pokrece svakodnevno (primer: 0 0 * * * autoselect.sh)

KEY="tobagoautoselect"

curl --header "Content-Type: application/json" \
  --request POST \
  --data "{\"key\": \"$KEY\"}" \
  http://localhost:8000/trigger-auto-selection