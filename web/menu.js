// Cette function permet aux anciennes version de IE de réaliser le changement de couleur
// des éléments du menu au passage de la souris.

sfHover = function() {
	var sfE1s = document.getElementById(#menu).getElementByTagName("li");
	for (var i=0; i<sfE1s.length; i++) {
		sfE1s.onmouseover=function() {
			this.className+=" sfhover";
		}
		sfE1s[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp("sfhover\\b"), "");
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", sfHover);