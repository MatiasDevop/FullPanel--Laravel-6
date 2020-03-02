<template>
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Users table</h3>

            <div class="card-tools">
              <button class="btn btn-success" @click="newModal">
                Add new
                <i class="fa fa-user-plus fa-fw"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Type</th>
                  <th>Register At</th>
                  <th>Modify</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="item in users" :key="item.id">
                  <td>{{item.id}}</td>
                  <td>{{item.name}}</td>
                  <td>{{item.email}}</td>
                  <td>{{item.type | upText}}</td>
                  <td>{{item.created_at | myDate}}</td>
                  <td>
                    <a href="#" @click="editModal(item)">
                      <i class="fa fa-edit blue"></i>
                    </a>
                    /
                    <a href="#" @click="deleteUser(item.id)">
                      <i class="fa fa-trash red"></i>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="addNewModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="addNewModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" v-show="!editmode" id="addNewModalLabel">Add New</h5>
            <h5 class="modal-title" v-show="editmode" id="addNewModalLabel">Update New</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form
            @submit.prevent="editmode ? updateUser() : createUser()"
            @keydown="form.onKeydown($event)"
          >
            <div class="modal-body">
              <div class="form-group">
                <label>Username</label>
                <input
                  v-model="form.name"
                  type="text"
                  name="name"
                  placeholder="Name"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('name') }"
                />
                <has-error :form="form" field="name"></has-error>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input
                  v-model="form.email"
                  type="text"
                  name="email"
                  placeholder="email"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('email') }"
                />
                <has-error :form="form" field="email"></has-error>
              </div>
              <div class="form-group">
                <label>Bio</label>
                <textarea
                  v-model="form.bio"
                  type="text"
                  name="bio"
                  id="bio"
                  placeholder="Shoer bio for user optional"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('bio') }"
                ></textarea>
                <has-error :form="form" field="username"></has-error>
              </div>
              <div class="form-group">
                <select
                  name="type"
                  v-model="form.type"
                  id="type"
                  class="form-control"
                  :class="{
                    'is-invalid':form.errors.has('type')}"
                >
                  <option value>Select User Role</option>
                  <option value="admin">Admin</option>
                  <option value="user">Standart User</option>
                  <option value="author">Author</option>
                </select>
                <has-error :form="form" field="type"></has-error>
              </div>
              <div class="form-group">
                <label>password</label>
                <input
                  v-model="form.password"
                  type="password"
                  name="password"
                  id="password"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('password') }"
                />
                <has-error :form="form" field="password"></has-error>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
              <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      editmode: false,
      users: {},
      form: new Form({
        //this form is to use for all component
        id: "",
        name: "",
        email: "",
        password: "",
        type: "",
        bio: "",
        photo: ""
      })
    };
  },
  methods: {
    updateUser() {
      this.$Progress.start();

      this.form
        .put("api/user/" + this.form.id)
        .then(() => {
          //success
          $('#addNewModal').modal('hide');
          swal.fire("Updated!", "Your file has been updated.", "success");
          this.$Progress.finish();
          Fire.$emit("AfterCreate");
        })
        .catch(() => {
          this.$Progress.fail();
        });
    },

    editModal(item) {
      this.editmode = true;
      this.form.reset();
      $("#addNewModal").modal("show");
      //$(".modal-backdrop").remove();
      this.form.fill(item);
    },

    newModal() {
      this.editmode = false;
      this.form.reset();
      $("#addNewModal").modal("show");
      // $(".modal-backdrop").remove();
    },

    loadUsers() {
      axios
        .get("api/user") //here we are using axios and function arrow
        .then(({ data }) => (this.users = data.data));
    },
    createUser() {
      this.$Progress.start();

      this.form
        .post("api/user")
        .then(response => {
          // with promises ECMA6
          Fire.$emit("AfterCreate"); // emmit an event after action an it trigger inmediatly

          toast.fire({
            icon: "success",
            title: "User created successfully"
          });
          //.then(()=>{
          //     console.log(response.data);
          //   if(response.data!=null){
          //      bus.$emit('AfterCreate');
          //   }
          // })

          $("#addNewModal").modal("hide");
          $(".modal-backdrop").remove();

          this.$Progress.finish();
        })
        .catch(() => {
          console.log("Error");
        });
    },
    deleteUser(id) {
      //modal alert to delete
      swal
        .fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!"
        })
        .then(result => {
          //Sedn request to the server controller/api .destroy
          if (result.value) {
            this.form
              .delete("api/user/" + id)
              .then(() => {
                swal.fire("Deleted!", "Your file has been deleted.", "success");
                Fire.$emit("AfterCreate");
              })
              .catch(() => {
                swal.fire("Failed!", "There was something wrong.", "Warning");
              });
          }
        });
    }
  },
  created() {
    this.loadUsers();
    Fire.$on("AfterCreate", () => {
      this.loadUsers();
    });

    //setInterval(()=> this.loadUsers(), 3000);
  }
  // mounted() {
  //     console.log('Component mounted.ssss')
  // }
};
</script>
