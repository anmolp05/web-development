var citiesByState = {
    andhrapradesh: ["Chittoor","Guntoor","Medak"],
    assam: ["Guwahati", "Majuli-island", "Sivasagar"],
    bihar: ["Bhagalpur", "Nalanda", "Patna"],
    chhattisgarh: ["Mahasamund"],
    delhi: [""],
    gujarat: ["Dholavira","Junagadh","Kevadiya","Lothal","Modhera","Patan","Pavagadh"],
    odisha: ["Bhubaneswar","Puri","Cuttack"],
    Maharashtra: ["Mumbai","Pune","Nagpur"],
    Kerala: ["kochi","Kanpur"]
}

function makeSubmenu(value) {
    if(value.length==0) document.getElementById("select-city").innerHTML = "<option></option>";
    else {
        var citiesOptions = "";
        for(cityId in citiesByState[value]) {
        citiesOptions+="<option>"+citiesByState[value][cityId]+"</option>";
        }
        document.getElementById("select-city").innerHTML = citiesOptions;
    }
}

function resetSelection() {
    document.getElementById("countrySelect").selectedIndex = 0;
    document.getElementById("citySelect").selectedIndex = 0;
}

var stateByCities = {
    chittoor: ["Andhra Pradesh"],
    guntoor: ["Andhra Pradesh"],
    agra: ["Uttar-Pradesh"],
}

function navigateToCityList(value) {
    if(value.length==0) document.getElementById("select-state").innerHTML = "<option></option?>";
    else {
        var stateOptions = "";
        for(stateId in stateByCities[value]) {
            stateOptions+="<option>"+stateByCities[value][stateId]+"</option>";
            }
            document.getElementById("select-state").innerHTML = stateOptions;
    }
}