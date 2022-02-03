const search = document.querySelector('input[placeholder="search roster"]');
const rosterContainer = document.querySelector(".rosters");

search.addEventListener("keyup", function (event) {
   if(event.key === "Enter") {
       event.preventDefault();

       const data = {search: this.value};

       fetch("/search", {
           method: "POST",
           headers: {
               'Content-Type': 'application/json'
           },
           body: JSON.stringify(data)
       }).then(function (response){
           return response.json();
       }).then(function(rosters){
          rosterContainer.innerHTML = "";
          loadRosters(rosters)
       });
   }
});

function loadRosters(rosters) {
    rosters.forEach(roster => {
        console.log(roster);
        createRoster(roster);
    });
}

function createRoster(roster) {
    const template = document.querySelector("#roster-template");

    const clone = template.content.cloneNode(true);
    const href = `http://localhost:8080/roster?id=${roster.roster_id}`;
    const name = roster.user_name.concat(" ", roster.user_surname);

    const title = clone.querySelector("a");
    title.innerHTML = roster.roster_title;
    title.setAttribute('href',href);
    const game = clone.querySelector("p[name=\"game\"]");
    game.innerHTML = roster.game_name;
    const points = clone.querySelector("p[name=\"points\"]");
    points.innerHTML = roster.points;
    const author = clone.querySelector("p[name=\"author\"]");
    author.innerHTML = name;



    rosterContainer.appendChild(clone);
}