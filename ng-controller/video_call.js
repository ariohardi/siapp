angular.module("RDash").controller("Video_call",function($scope,$rootScope,$http,$window,$location,$timeout,$interval,$state){
	$scope.callListeners = {
	    //call is "ringing"
	    onCallProgressing: function(call) {
	        jQuery("div#status").append("<div>Ringing</div>");
	    },
	    //they picked up the call!
	    onCallEstablished: function(call) {
	        jQuery("div#status").append("<div>Call established</div>");
	        jQuery("video#outgoing").attr("src", call.outgoingStreamURL);
	        jQuery("video#incoming").attr("src", call.incomingStreamURL);
	    },
	    //ended by either party
	    onCallEnded: function(call) {
	        jQuery("div#status").append("<div>Call ended</div>");
	        jQuery("video#outgoing").attr("src", "");
	        jQuery("video#incoming").attr("src", "");
	        call = null;
	    }
	}
	$timeout(function() {
		var calling = $rootScope.sinchClient.callClient.callUser($location.path().substring(12));
		calling.addEventListener($scope.callListeners);
	}, 5000);
});