function doc(nomid) {
  return document.querySelector(nomid);
}
let suiv1 = doc("#verdict");
function check(value) {
  if (value.checked)
    suiv1.style.display = "inline-block";
  else suiv1.style.display = "none";
}

let acceptation = doc(".acceptation");
let importation = doc(".importation");
function change(cacher, apparue) {
  cacher.style.display = "none";
  apparue.style.display = "inline-flex";
}
function apparaitre(value, type) {
  value.style.display = type;
}
let imports = doc(".import");
let importcheck = doc(".importcheck");
let suiv2 = doc("#verdict2");
let suiv3 = doc("#verdict3");
let titregenre = doc(".titreGenre");
let verification = doc(".verification");
let pinfo = doc(".pinfo");
let accueilmodal = doc(".accueilModal");
let quitter = doc(".quitter");
let favoris = doc(".favoris");
let favorismodal = doc(".favorismodal");
function favori(values) {
  if (parseInt(values.value()) == 1) values.style.color = "red";
  else values.style.color = "white";
}
let coeur = false;
favoris.addEventListener("click", (e) => {
  if (coeur == false) {
    favoris.style.color = "red";
    coeur = true;
  } else {
    favoris.style.color = "white";
    coeur = false;
  }
});
