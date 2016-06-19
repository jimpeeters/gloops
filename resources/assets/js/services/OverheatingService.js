gloopsApp.service("OverheatingService", function() {

    //Serves as glue between loopcontrollers, so only 1 loop plays at a time.
    this.playingLoopId = null;
    this.playingLoopButtonId = null;

})