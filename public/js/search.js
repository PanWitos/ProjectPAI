const search = document.querySelector('input[placeholder="search roster"]');
const rosterContainer = document.querySelector(".rosters");

search.addEventListener("keyup", function (event) {
   if(event.key === "Enter") {
       console.log("Wcisnales Enter");
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

    const title = clone.querySelector("h2");
    title.innerHTML = roster.title;
    const game = clone.querySelector("p[name=\"game\"]");
    game.innerHTML = roster.game;
    const points = clone.querySelector("p[name=\"points\"]");
    points.innerHTML = roster.points;


    rosterContainer.appendChild(clone);
}