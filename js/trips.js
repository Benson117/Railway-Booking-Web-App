var allResults = [];
var filteredResults = [];
$(document).ready(() => {
    document.body.style.backgroundImage = "";
    allResults = document.getElementsByTagName("tr");
    for(let i = 0;i < allResults.length;i++) {
        if(i !== 0 ) filteredResults.push(allResults[i])
    }
    // console.log(filteredResults);
    $("#all_trips").click(() => {
        allTrips();
    });
    $("#inner_city_trips").click(() => {
        ClearAll();
        allTrips();
    });
    $("#long_distance_trips").click(() => {
        ClearAll();
        allTrips();
    });
    $("#one_day_trips").click(() => {
        ClearAll();
        oneDay();
    });
    $("#oner_night_trips").click(() => {
        ClearAll();
        overNight();
    });
    $("#durban_trips").click(() => {
        ClearAll();
        durban();
    });
    $("#red_eye_trips").click(() => {
        ClearAll();
        redEye();
    });

    $("#clear").click(() => {
        allTrips();
    });
})

// show all trips
let allTrips = () => {
    for(i=0;i < document.getElementById("table").children[0].length;i++) {
        document.getElementById("table").children[0][i].style.display = "table-row";
    }
}

// hide everything
let ClearAll = () => {
    for(i=0;i < allResults.length;i++) {
        // console.log(allResults[i]);
        if(i !== 0) {
            allResults[i].style.display = "none";
        }
    }
}

// overnight trips
let overNight = () => {
    for(let i = 0;i < allResults.length;i++) {
        let time = allResults[i].children[5].innerHTML;
        if(parseInt(time.split(":")[0]) > 6) {
            allResults[i].style.display = "table-row";
        }
    }
}

// red-eye trips
let redEye = () => {
    for(let i = 0;i < allResults.length;i++) {
        // console.log(parseInt(allResults[i].children[4].innerHTML.split(":")[0]));
        if(parseInt(allResults[i].children[4].innerHTML.split(":")[0]) <= 4) {
            console.log("---");
            allResults[i].style.display = "table-row";
        }
    }
}

// show one day trips
let oneDay = () => {
    for(let i = 0;i < allResults.length;i++) {
        let time = allResults[i].children[5].innerHTML;
        console.log(parseInt(time.split(":")[0]));
        if(parseInt(time.split(":")[0]) < 6) {
            allResults[i].style.display = "table-row";
        }
    }
}

// show trips to durban
let durban = () => {
    for(let i = 0;i < allResults.length;i++) {
        if(allResults[i].children[2].innerHTML === "Durban") {
            allResults[i].style.display = "table-row";
        }
    }
}

// show long distance trips
let longDistance = () => {
    for(let i = 0;i < allResults.length;i++) {
        if(allResults[i].children[2].innerHTML !== allResults[i].children[1].innerHTML) {
            allResults[i].style.display = "table-row";
        }
    }
}

// show long distance trips
let innerCity = () => {
    for(let i = 0;i < allResults.length;i++) {
        if(allResults[i].children[2].innerHTML === allResults[i].children[1].innerHTML) {
            allResults[i].style.display = "table-row";
        }
    }
}