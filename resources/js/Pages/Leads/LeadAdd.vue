<template>
  <layout>
    <div class="container">
      <form @submit.prevent="handleSubmit">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="name">Name</label>
              <input
                type="text"
                class="form-control"
                placeholder="Enter Name"
                v-model="lead.name"
                id="name"
                tabindex="1"
              />
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input
                type="text"
                class="form-control"
                placeholder="Enter Phone Number"
                v-model="lead.phone"
                id="phone"
                tabindex="2"
              />
            </div>
            <div class="form-group">
              <label for="ip">Interested Package</label>
              <input
                type="text"
                class="form-control"
                placeholder="Enter Interested Package"
                v-model="lead.interested_package"
                id="ip"
                tabindex="3"
              />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="email">Email</label>
              <input
                type="text"
                class="form-control"
                placeholder="Enter Email"
                v-model="lead.email"
                id="email"
                tabindex="4"
              />
            </div>
            <div class="form-group">
              <label for="dob">Date of Birth</label>
              <input
                type="date"
                class="form-control"
                placeholder="Enter Date of Birth"
                v-model="lead.dob"
                id="dob"
                tabindex="5"
              />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <button class="btn btn-success">Save</button>
            <!-- This is for routing using ziggs by taking the id inside this table and this use the name inside the web.php the name for the view is lead.view inside web -->

            <inertia-link class="btn btn-warning" :href="route('lead.list')">
              Back</inertia-link
            >
          </div>
        </div>
      </form>
    </div>
  </layout>
</template>
<script>
import Layout from "../../Shared/Layout.vue";
export default {
  components: {
    Layout,
  },
  data() {
    return {
      lead: {
        name: "",
        email: "",
        phone: "",
        dob: "",
        interested_packagee: "",
      },
    };
  },
  methods: {
    async handleSubmit() {
      let response = await this.$inertia.post("/leads/save", this.lead);
    },
  },
};
</script>