var date = new Date();
var days = new Array ("Dimanche", "Lundis", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
var month = new Array ("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");


document.write(days[date.getDay()]+" "+date.getDate()+" "+month[date.getMonth()]+" "+date.getFullYear());
