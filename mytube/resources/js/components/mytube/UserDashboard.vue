<template>
  <div class="user-dashboard">
    <div id="wrapper">
      <div id="home">
        <img id="img" src="/imgs/m.png" alt="ảnh" />
      </div>

      <div id="Search">
        <div id="form">
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" />
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </div>

      <div id="user">
        <el-dropdown trigger="click">
          <span class="el-dropdown-link">
            <img id="avt" src="/imgs/avatar.png" alt="ảnh đại diện" />
          </span>
          <el-dropdown-menu slot="dropdown">
            <el-dropdown-item icon="el-icon-circle-plus">đăng kí</el-dropdown-item>
            <el-dropdown-item icon="el-icon-circle-plus">đăng nhập</el-dropdown-item>
          </el-dropdown-menu>
        </el-dropdown>
      </div>
    </div>
    <div class="list-products">
      <div class="listvideo" v-for="prod in list_videos" :key="prod.id">
        <div>
          <video width="160px" height="85px" controls="controls">
            <source src="'/videos/'+prod.nameVideo" type="video/mp4" />
          </video>
        </div>
        <div>{{ prod.nameVideo }}</div>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      list_videos: []
    };
  },

  created() {
    this.getListVideo();
  },
  methods: {
    getListVideo() {
      axios.get("/video").then(response => {
        this.list_videos = response.data;
      });
    }
  }
};
</script>

<style lang="scss" scoped>
</style>