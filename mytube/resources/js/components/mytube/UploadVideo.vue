<template>
  <div class="api-calling">
    <div class="list-products">
      <h2>
        <center>LIST VIDEO</center>
      </h2>
      <div class="product-table">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>NameUser</th>
              <th>NameVideo</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="prod in list_videos" :key="prod.id">
              <td>{{prod.id}}</td>
              <td>{{ prod.nameUser }}</td>
              <td>{{ prod.nameVideo }}</td>
              <td>
                <button class="btn btn-danger" @click="deleteProduct(prod, prod.id)">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <input type="file" v-on:change="videoss" class="form-control" ref="file" />
      </div>
      <div class="col-md-3">
        <button class="btn btn-success btn-block" @click="uploadVideo">Upload Image</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      video: {
        name: "",
        user: ""
      },
      list_videos: [],
      file: []
    };
  },

  created() {
    this.getListVideo();
  },
  methods: {
    getListVideo() {
      axios.post("/showVideo").then(response => {
        this.list_videos = response.data.videoss;
      });
    },
    deleteProduct(video, index) {
      axios.delete("/video/" + video.id).then(response => {
        console.log(response.data.result);
        this.list_videos.splice(index, 1);
      });
    },
    videoss() {
      this.file = this.$refs.file.files[0];
      this.video.name = this.$refs.file.files[0].name;
      this.video.user = this.$refs.file.files[0].name;
      console.log(this.video.name);
    },
    uploadVideo() {
      let formData = new FormData();
      formData.append("file", this.file);
      axios
        .post("/video", formData, {
          headers: {
            "Content-Type": "multipart/form-data"
          }
        })
        .then(response => {
          this.list_videos.push(response.data.videoxxx);
        })
        .catch(function() {
          alert("upload k thành công");
        });
    }
  }
};
</script>

<style lang="scss" scoped>
</style>