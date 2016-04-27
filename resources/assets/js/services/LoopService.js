gloopsApp.service("LoopService", function() {
    
    // Create new object to store loops in
    this.seamlessLoops = new SeamlessLoop();
    
    // Add loops to object
    this.addloops = function(loops) {
        
        foreach(loops as loop) {
            seamlessLoops.addUri(loop.loop_path, loop.duration, loop.name);
        }
    }

    this.seamlessLoops.callback(soundsLoaded);

    this.playLoop = function(loopname) {

    }
})