/* These variables determine the new location of the moving box */
var parentElement2; // Represents the container of the box grid
var moveBox; // The moving box
var moveBlock; // The parent of the moving box
var moveBlockIndex2; // Index of the moveBlock variable

/* Top left x & y coordinates of the box while it's moving */
var elementXCoord;
var elementYCoord;

/********************************************************************  
		This function will load all of the boxes into a grid. 
		The prepareMove2 function is assigned to the mousedown event and 
		the stopMove2 function is assigned to mouseup. 
********************************************************************/

function coba2() {
	var gridDiv = document.getElementById("boxLayout2");
	parentElement2 = document.getElementById("boxLayout2");

	for (i = 0; i < 18; i++) {
		var newList = document.createElement("li");
		newList.className = "block";

		var box = document.createElement("span");
		box.className = "box";
		box.textContent = i;
		box.onmousedown = prepareMove2;

		newList.appendChild(box);
		gridDiv.appendChild(newList);
	}
	document.onmouseup = stopMove2;
}

/******************************************************************** 
		This function is called once a user clicks down on a box. 
		The moveElement2 function is triggered once the user starts 
		moving the box around.
********************************************************************/

function prepareMove2(event) {
	event.preventDefault();
	
	elementXCoord = event.pageX - event.currentTarget.offsetLeft;
	elementYCoord = event.pageY - event.currentTarget.offsetTop;
	
	if (typeof event.currentTarget != 'undefined') {
		moveBlock = event.currentTarget.parentNode;
		moveBlockIndex2 = getChildIndex2(parentElement2, moveBlock);
		moveBox = event.currentTarget;

		moveBox.style.opacity = 0.5;
		
		/*************************************************************** 
		Once the mousedown event is called, it creates a clone of that 
		box to keep in the original position while user looks for a 
		new position.
		****************************************************************/ 
		moveBlock.appendChild(moveBox.cloneNode(true));

		moveBox.style.position = 'absolute';
		moveBox.style.zIndex = 2;

		moveBox.onmousemove = moveElement2;
		moveElement2(event);
	}
}

/******************************************************************** 
		This function is called when the user is moving the box around. 
		It first finds the x & y mouse coordinates and calculates the
		new position of the moving box.  
********************************************************************/

function moveElement2(event) {
	var mouseXCoord = event.pageX; // x coordinate of the mouse as it moves
	var mouseYCoord = event.pageY; //y coordinate of the mouse as it moves

	var newMouseXCoord = event.pageX - event.currentTarget.parentNode.offsetLeft;
	var newMouseYCoord = event.pageY - event.currentTarget.parentNode.offsetTop;
	
	/* Re-calculate the top & left positions of the moving box */
	moveBox.style.left = (mouseXCoord - elementXCoord) + "px";
	moveBox.style.top = (mouseYCoord - elementYCoord) + "px";

	var block = parentElement2.childNodes; // the container for all of the boxes (child nodes)

	/* Loop through the array containing all the boxes to determine new placement */
	for (i = 0; i < block.length; i++) {

		/* targetIndex will be used to determine the new position in the array */
		var targetIndex = getChildIndex2(parentElement2, block[i]);

		/* Get the box constraints to compare with the coordinates of the moving box */
		if (targetIndex != moveBlockIndex2) {
			var minTopConstraint = block[i].childNodes[0].offsetTop;
			var maxTopConstraint = block[i].childNodes[0].offsetTop + block[i].childNodes[0].clientHeight;
			var minLeftConstraint = block[i].childNodes[0].offsetLeft;
			var maxLeftConstraint = block[i].childNodes[0].offsetLeft + block[i].childNodes[0].clientWidth;

			if (minTopConstraint <= newMouseYCoord && newMouseYCoord <= maxTopConstraint) {
				if (minLeftConstraint <= newMouseXCoord && newMouseXCoord <= maxLeftConstraint) {
					if (targetIndex < moveBlockIndex2) {
						parentElement2.insertBefore(moveBox.parentNode, block[i]);
					} else {
						insertAfter2(block[i], moveBox.parentNode);
					}
					moveBlockIndex2 = getChildIndex2(parentElement2, moveBlock);
					break;
				}
			}
		}
	}
}

/********************************************************************  
		When the mouseup event is called, this function will reset our 
		variables used to track the moving box. In addition, it will
		remove the cloned box. 
********************************************************************/

/********************************************************************  
		As the user moves the box around, this function is called to 
		find what the current index is where the box would be 
		re-positioned.  
********************************************************************/

function getChildIndex2 (parent, child) {
	for (i = 0; i < parentElement2.childNodes.length; i++) {
		if (child == parent.childNodes[i]) {
			return i;
		}
	}
}

/********************************************************************  
		This function is called when the moving box is to be placed 
		after its original location in the node list. If 
		referenceNode.nextSibling is null, then it will insertBefore 
		that node.
********************************************************************/

function insertAfter2(referenceNode, newNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}

function stopMove2(event) {
	if (moveBox && moveBlock) {
		moveBox.style.opacity = 1;
		moveBox.style.position = 'static';
		moveBox.style.zIndex = 1;
		moveBox.onmousemove = null;
		moveBlock.removeChild(moveBlock.childNodes[1]);

		moveBox = null;
		moveBlock = null;
	}	
}
  
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-46156385-1', 'cssscript.com');
ga('send', 'pageview');