<template>
  <div class="user-dashboard">
    <div id="wrapper">
      <div id="home">
        <img id="img" src="/imgs/m.png" alt="ảnh" />
      </div>

      <div id="Search">
        <div id="form">
          <input class="form-control mr-sm-2" v-model="search" placeholder="Search" />
          <button @click="searchData()">Search</button>
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
            <source :src="`/videos/${prod.nameVideo.replace(/<[^>]*>?/gm, '')}`" type="video/mp4" />
            <!-- {!!strip_tags($item->nameVideo,'b')!!} -->
          </video>
        </div>
        <div v-html="`${prod.nameVideo}`"></div>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      search: "",
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
    },

    searchData() {
      axios.post("/search", { search: this.search }).then(response => {
        this.list_videos = response.data.kqSearch;
      });
    }
  }
};
</script>

<style lang="scss" scoped>
</style>