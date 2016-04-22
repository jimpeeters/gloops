gloopsApp.service("RewardService", function() {
    
    // Station overheating reward
    
    this.playingLoops = 0;
    this.isOverheating = false;
        
    this.increaseOverheating = function() {
        this.playingLoops ++;
        this.checkOverheating();
    }
    
    this.decreaseOverheating = function() {
        this.playingLoops --;
        this.checkOverheating();
    }
    
    this.checkOverheating = function() {
        
        if (this.playingLoops >= 9) {
            this.isOverheating = true;
            
            if (this.playingLoops = 9) {
                angular.element('#overheating-modal').modal('show');
            }
        }
        else {
            this.isOverheating = false;
        }
    }

})