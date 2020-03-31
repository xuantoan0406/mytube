<template>
  <div class="user-dashboard">
    <div id="wrapper">
      <div id="home">
        <a href="/">
          <img id="img" src="/imgs/m.png" alt="ảnh" />
        </a>
      </div>

      <div id="Search">
        <div id="form">
          <div class="search-bar">
            <input class="form-control mr-sm-2" v-model="search" placeholder="Search" />
          </div>
          <div class="button-search">
            <button class="btn btn-primary mb-2" @click="searchData()">Search</button>
          </div>
        </div>
      </div>

      <div id="user">
        <template v-if="nameUser==''">
          <el-dropdown trigger="click">
            <span class="el-dropdown-link">
              <img id="avt" src="/imgs/avatar.png" alt="ảnh đại diện" />
            </span>
            <el-dropdown-menu slot="dropdown">
              <el-dropdown-item icon="el-icon-circle-plus">
                <a href="/registers">đăng kí</a>
              </el-dropdown-item>
              <el-dropdown-item icon="el-icon-circle-plus">
                <a href="/logins">đăng nhập</a>
              </el-dropdown-item>
            </el-dropdown-menu>
          </el-dropdown>
        </template>

        <template v-else>
          <el-dropdown trigger="click">
            <span class="demonstration">{{nameUser}}</span>
            <el-dropdown-menu slot="dropdown">
              <el-dropdown-item icon="el-icon-circle-plus">
                <a href="/video/create">UploadVidep</a>
              </el-dropdown-item>
            </el-dropdown-menu>
          </el-dropdown>
        </template>
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
      list_videos: [],
      nameUser: ""
    };
  },

  created() {
    this.getListVideo();
  },

  methods: {
    getListVideo() {
      axios.post("/showVideo").then(res => {
        this.list_videos = res.data.videoss;
        this.nameUser = res.data.nameUser;
      });
    },

    searchData() {
      axios.post("/search", { search: this.search }).then(response => {
        this.list_videos = response.data.kqSearch;
      });
      //this.$router.replace({ path: "search", query: { query: this.search } });
    }
  }
};
</script>

<style lang="scss" scoped>
</style>