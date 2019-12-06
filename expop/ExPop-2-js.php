<?php
Header('Content-Type: text/javascript');
Header('Expires: Wed, 11 Jan 1984 05:00:00 GMT');
Header('Cache-Control: no-cache');
Header('Pragma: no-cache');
?>
/**********************

	ExPop 2.0
	On-Page Exit Popup Controller
	(c) Copyright 2007-9 Gecko Tribe, LLC
	All Rights Reserved
	by Antone Roundy

	*** THIS IS NOT FREE SOFTWARE ***

	Unauthorized copying and creating
	derivative code based on parts of this
	code are forbidden by copyright law.
	If you're going to use this script or
	any part of it, please do so legally
	and honestly by buying a copy at:

	http://www.geckotribe.com/expop/

	Resale of this script or derivative
	code is prohibited unless resale rights
	have been purchased from the copyright
	owner.  (Resale rights may not be
	available for purchase at this time).

	Thank you.  Your honesty makes it possible
	for me to take time from other work to
	create and support scripts like this.

**********************/

<?php
if (!strlen($_SERVER['HTTP_REFERER']))
	$show=(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE')!==false)&&
		strpos($_SERVER['HTTP_USER_AGENT'],'Mac_');
else $show=1;
if ($show) {
?>

var exPopLimX=1200;
var exPopLimY=60;
var exPopInLim=50;

var exPopMaxDisplays=4;
var exPopCheckScroll=2;
var exPopSkips=3;
var exPopMinInterval=3;

var exPopCookies=1;
var exPopShowInterval=60;
var exPopShowLimit=2;
var exPopShowHardLimit=0;
var exPopCookieId='';
var exPopCookiePath='/';
var exPopCookieDays=30;

var exPopPopId='expop';
var exPopDimId='expop_dim';

var exPopDimPage=1;
var exPopFadeIn=0;
var exPopFadeOut=0;
var exPopBGOpacity=0.8;

var exPopHideElements=new Array('object','embed','select');
var exPopDontHideElements=new Array();

/*********************/

var exPopHiddenElements=new Array();
var exPopWentIn=0;
var exPopped=0;
var exPopTimesShown=0;
var exPopLastUnpop=0;
var exPopSinceLast=-1;
var exPopX, exPopY,exPopDim,exPopPop;
var exPopTop=-1;
var exPopBrowser=-1;
var exPopDE=false;
var exPopIEMac=(navigator.userAgent.indexOf("Mac_")>-1)&&(navigator.userAgent.indexOf("MSIE")>-1);
var exPopInited=0;

var exPopBeforePop=new Array();
var exPopAfterPop=new Array();
var exPopBeforeUnPop=new Array();
var exPopAfterUnPop=new Array();

function exPopAddTrigger(phase,func) {
	if (phase=='BeforePop') exPopBeforePop[exPopBeforePop.length]=func;
	else if (phase=='AfterPop') exPopAfterPop[exPopAfterPop.length]=func;
	else if (phase=='BeforeUnPop') exPopBeforeUnPop[exPopBeforeUnPop.length]=func;
	else if (phase=='AfterUnPop') exPopAfterUnPop[exPopAfterUnPop.length]=func;
}
function exPopSetOpacity(step,dir,why) {
	var ob,op,nextstep;
	op=step*20;
	if (exPopDimPage) {
		ob=exPopBGOpacity*op;
		exPopDim.style.opacity=ob/100;
		exPopDim.style.filter='alpha(opacity='+ob+')';
	}
	exPopPop.style.opacity=op/100;
	exPopPop.style.filter='alpha(opacity='+op+')';
	nextstep=Number(step)+Number(dir);
	if (
		((dir==1)&&(step<5))||
		((dir==-1)&&(step>0))
	) setTimeout('exPopSetOpacity('+nextstep+','+dir+',"'+why+'")',5);
	else if (dir==-1) exPopFinishUnpop(why);
}
function exPopScrollFix() {
	var scrolled;
	scrolled=exPopBrowser?exPopDE.pageYOffset:exPopDE.scrollTop;
	exPopPop.style.top=(exPopTop+scrolled)+'px';
	if (!exPopBrowser) exPopDim.style.top=scrolled+'px';
}
function exPopSetCookie(name,value,days,path) {
	if (days) {
		var date=new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires='; expires='+date.toGMTString();
	} else var expires='';
	document.cookie=name+'='+value+expires+'; path='+path;
}
function exPopGetCookie(name) {
	var ca=document.cookie.split(';');
	for(var i=0;i<ca.length;i++) {
		var c=ca[i];
		while (c.charAt(0)==' ') c=c.substring(1,c.length);
		if (c.indexOf(name+'=')==0) return c.substring(name.length+1,c.length);
	}
	return null;
}
function exPopClearCookie(name) { exPopSetCookie(name,'',-1); }
function exPopPopIt(checkSkips) {
	var popIt=1;
	var thisCookieID;
	var thisCookie;
	var thisTime;
	var theTime;
	if (!exPopped) {
		if (checkSkips) {
			if ((exPopSinceLast==exPopSkips)||(exPopSinceLast==-1)) exPopSinceLast=0;
			else {
				exPopSinceLast++;
				exPopWentIn=0;
				popIt=0;
			}
		}
		if (popIt&&((!exPopMaxDisplays)||(exPopTimesShown<exPopMaxDisplays))) {
			theTime=new Date().getTime()/1000;
			if (theTime<exPopMinInterval+exPopLastUnpop) return;
			if (exPopCookies) {
				thisTime=Math.round(theTime/60);
				thisCookieID='ExPop|'+(exPopCookieId.length?(exPopCookieId+'|'):'')+(exPopCookiePath.length?exPopCookiePath:window.location.pathname);
				thisCookie=thisCookieID.length?exPopGetCookie(thisCookieID):'';
				if (thisCookie) {
					thisCookie=thisCookie.split('|');
					if (exPopShowHardLimit&&(thisCookie[2]>=exPopShowHardLimit)) return;
					if (exPopShowLimit&&exPopShowInterval&&(thisCookie[0]>=exPopShowLimit)&&((Number(thisCookie[1])+exPopShowInterval)>thisTime)) return;
				} else thisCookie='';
			}
			var i,j,k,e,es,hideIt;
			exPopped=1;
			for (i=0;i<exPopBeforePop.length;i++) if (!exPopBeforePop[i]()) {
				exPopped=0;
				exPopWentIn=0;
				return;
			}
			exPopHiddenElements=new Array();
			for (i=0;i<exPopHideElements.length;i++) {
				es=document.getElementsByTagName(exPopHideElements[i]);
				for (j=0;j<es.length;j++) {
					if (es[j].style.visibility=='visible') {
						hideIt=1;
						if (es[j].id!='undefined') for (k=0;k<exPopDontHideElements.length;k++) if (es[j].id==exPopDontHideElements[k]) {
							hideIt=0;
							k=exPopDontHideElements.length;
						}
						if (hideIt) {
							exPopHiddenElements[exPopHiddenElements.length]=es[j];
							es[j].style.visibility='hidden';
						}
					}
				}
			}
			if (exPopFadeIn) exPopSetOpacity(1,1,'');
			if (exPopDimPage) {
				exPopDim.style.display='block';
				if (!exPopBrowser) exPopDim.style.height=exPopDE.offsetHeight+exPopDE.scrollTop;
			}
			exPopPop.style.display='block';
			if (exPopTop==-1) exPopTop=exPopPop.offsetTop;
			exPopScrollFix();
			exPopTimesShown++;
			
			if (exPopCookies&&thisCookieID.length) {
				if (thisCookie.length) {
					thisCookie[2]++;
					if ((Number(thisCookie[1])+exPopShowInterval)<=thisTime) {
						thisCookie[1]=thisTime;
						thisCookie[0]=1;
					} else thisCookie[0]++;
					thisCookie=thisCookie.join('|');
				} else thisCookie='1|'+thisTime+'|1';
				exPopClearCookie(thisCookieID);
				exPopSetCookie(thisCookieID,thisCookie,exPopCookieDays,exPopCookiePath.length?exPopCookiePath:window.location.pathname);
			}
			for (i=0;i<exPopAfterPop.length;i++) exPopAfterPop[i]();
		}
	}
}
function exPopFinishUnpop(why) {
	exPopPop.style.display='none';
	if (exPopDimPage) exPopDim.style.display='none';
	exPopped=exPopWentIn=0;
	if (exPopIEMac) {
		window.resizeBy(-1,0);
		window.resizeBy(1,0);
	}
	for (i=0;i<exPopHiddenElements.length;i++) exPopHiddenElements[i].style.visibility='visible';
	for (i=0;i<exPopAfterUnPop.length;i++) exPopAfterUnPop[i](why);
	exPopLastUnpop=new Date().getTime()/1000;
}
function exPopUnPop(why) {
	var i,e;
	for (i=0;i<exPopBeforeUnPop.length;i++) exPopBeforeUnPop[i](why);
	if (exPopFadeOut) exPopSetOpacity(4,-1,why);
	else exPopFinishUnpop(why);
}
function exPopGetPos(myE,checkScroll) {
	if (checkScroll) {
		if (exPopBrowser) {
			exPopX=myE.pageX;
			exPopY=myE.pageY;
		} else {
			exPopX=myE.clientX+exPopDE.scrollLeft;
			exPopY=myE.clientY+exPopDE.scrollTop;
		}
	} else {
		if (exPopBrowser) {
			exPopX=myE.pageX-exPopDE.pageXOffset;
			exPopY=myE.pageY-exPopDE.pageYOffset;
		} else {
			exPopX=myE.clientX;
			exPopY=myE.clientY;
		}
	}
}
function exPopCheck(ifMatch,X,Y) {
	return ((exPopY<Y)&&(exPopX<(X*2-(exPopY*X/Y))))?ifMatch:(1-ifMatch);
}
function exPopMonitor(e) {
	var myE;
	if (!exPopped) {
		if (e) myE=e;
		else if (window.event) myE=window.event;
		else myE=null;
		if (myE) {
			if (exPopBrowser==-1) exPopBrowser=(typeof(myE.pageX)=='number');
			if (exPopBrowser&&(/select|option|optiongroup/i.test(myE.target.tagName))) return true;
			if (exPopWentIn) {
				exPopGetPos(myE,exPopCheckScroll);
				if (exPopCheck(1,exPopLimX,exPopLimY)) exPopPopIt((exPopCheckScroll==2)?0:exPopSkips);
				else if (exPopCheckScroll==2) {
					exPopGetPos(myE,0);
					if (exPopCheck(1,exPopLimX,exPopLimY)) exPopPopIt(exPopSkips);
				}
			} else {
				exPopGetPos(myE,0);
				if (exPopCheck(0,exPopLimX+exPopInLim,exPopLimY+exPopInLim)) exPopWentIn=1;
			}
		}
	}
	return true;
}
function exPopCatchScroll(e) {
	var myE;
	if (exPopped) exPopScrollFix();
}
function exPopChainEventHandler(f1,f2) {
	return function() {
		if (f1) f1();
		f2();	
	}
}
function exPopInit() {
	exPopPop=document.getElementById(exPopPopId);
	if (exPopDimPage) exPopDim=document.getElementById(exPopDimId);
	if (typeof(window.innerWidth)=='number') exPopDE=window;
	else if (document.documentElement && (typeof(document.documentElement.clientWidth)=='number') &&
		(document.documentElement.clientWidth!=0)) exPopDE=document.documentElement;
	else if (document.body && typeof(document.body.clientWidth=='number')) exPopDE=document.body;
	if (exPopDE) {
		if (document.addEventListener) {
			document.addEventListener('mousemove',exPopMonitor,true);
			document.addEventListener('scroll',exPopCatchScroll,true);
		} else if (window.attachEvent) {
			window.document.attachEvent('onmousemove',exPopMonitor);
			window.attachEvent('onscroll',exPopCatchScroll);
		} else {
			if (typeof(document.all)=='undefined') {
				document.captureEvents(Event.MOUSEMOVE);
				document.captureEvents(Event.SCROLL);
			}
			document.onmousemove=exPopChainEventHandler(document.onmousemove,exPopMonitor);
			document.onscroll=exPopChainEventHandler(document.onscroll,exPopCatchScroll);
		}
	}
	var theBody = document.getElementsByTagName("body")[0];
	var temp=theBody.lastChild;
	if (temp!=exPopPop) {
		if (exPopDimPage) {
			exPopDim.parentNode.removeChild(exPopDim);
			theBody.appendChild(exPopDim);
		}
		exPopPop.parentNode.removeChild(exPopPop);
		theBody.appendChild(exPopPop);
	}
	exPopInited=1;
}
if (document.addEventListener) {
	if (/webkit|safari|khtml/i.test(navigator.userAgent)) {
		function exPopKHTMLInit() {
			/loaded|complete/.test(document.readyState)?exPopInit():setTimeout(exPopKHTMLInit,100);
		}
		exPopKHTMLInit();
	} else document.addEventListener("DOMContentLoaded", exPopInit, false);
} else if (window.attachEvent) window.attachEvent('onload',exPopInit);
else window.onload=exPopChainEventHandler(window.onload,exPopInit);

<?php } ?>
