<template>
  <div class="had-container">
      <div class="card card_main p-fixed users-main">
          <div class="user-box">
              <div class="card-block">
                  <div class="right-icon-control">
                      <input type="text" class="form-control  search-text" placeholder="Search Friend" id="search-friends">
                      <div class="form-icon">
                          <i class="icofont icofont-search"></i>
                      </div>
                  </div>
              </div>
              <div class="main-friend-list">
                  <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">
                      <a class="media-left" href="javascript:">
                          <img class="media-object img-circle" src="assets/images/avatar-1.png" alt="Generic placeholder image">
                          <div class="live-status bg-success"></div>
                      </a>
                      <div class="media-body">
                          <div class="f-13 chat-header">Josephin Doe</div>
                      </div>
                  </div>

              </div>
          </div>
      </div>
  </div>

</template>
<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
