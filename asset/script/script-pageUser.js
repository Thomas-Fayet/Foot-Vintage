"use strict";

/* ---------------------------------------------------------------DECLARATION DES VARIABLES --------------------------------------------------------------- */

/* ------------------- profil_user : gestion affichage infos utilisateur et changement mdp ------------------- */

let btnInfo = document.getElementById("button-info");
let btnPassword = document.getElementById("button-password");
let containerProfilInfo = document.getElementById("container-profil-info");
let containerPasswordForget = document.getElementById("container-password-forget");


// /* ------------------- profil_user : modification informations utilisateurs ------------------- */

let btnUpdateInfo = document.getElementById("button-update-info");
let profilInfo = document.getElementById("profil-info");
let profilUpdateInfo = document.getElementById("profil-update-info");



// /* --------------------------------------------------------------- GESTION DES EVENEMENTS --------------------------------------------------------------- */

// /* ------------------- profil_user : gestion affichage infos utilisateur et changement mdp ------------------- */

btnInfo.addEventListener('click', () => displayInfo());
btnPassword.addEventListener('click', () => displayPassword());


// /* ------------------- profil_user : modification informations utilisateurs ------------------- */

btnUpdateInfo.addEventListener('click', () => updateInfo());



// /* --------------------------------------------------------------- DECLARATION DES FONCTIONS --------------------------------------------------------------- */

// /* ------------------- profil_user : gestion affichage infos utilisateur et changement mdp ------------------- */

function displayInfo() {
    if (getComputedStyle(containerProfilInfo).display == "none") {
        containerProfilInfo.style.display ="block";
        containerPasswordForget.style.display ="none";
        profilInfo.style.display ="block";
        profilUpdateInfo.style.display ="none";
    } 
    else if(getComputedStyle(profilInfo).display == "none") {
        profilInfo.style.display ="block";
        profilUpdateInfo.style.display ="none";
    } 
    else {
        containerProfilInfo.style.display ="block";
    }
}

function displayPassword() {
    if (getComputedStyle( containerPasswordForget).display == "none") {
        containerProfilInfo.style.display ="none";
        containerPasswordForget.style.display ="block";
    } else {
        containerPasswordForget.style.display ="block";
    }
}


// /* ------------------- profil_user : modification informations utilisateurs ------------------- */

function updateInfo() {
    if (getComputedStyle(profilUpdateInfo).display == "none") {
        profilInfo.style.display ="none";
        profilUpdateInfo.style.display ="block";
    } else {
        profilUpdateInfo.style.display ="block";
    }
}

