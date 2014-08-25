function showPic(whichpic){

	var source = whichpic.getAttribute("href");
	var snapshot = document.getElementById("snapshot");
	snapshot.setAttribute("src",source);
	var text = whichpic.getAttribute("title");
	var description = 	document.getElementById("description");
	description.firstChild.nodeValue = text;
	return false;
}