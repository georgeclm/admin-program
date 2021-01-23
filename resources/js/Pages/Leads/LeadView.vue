<template>
  <layout>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>
            <inertia-link :href="route('lead.list')"> Leads </inertia-link>
            <span class="breadcrumb-sep">/</span>
            Lead Details
          </h1>
        </div>
      </div>
      <div class="row-mb-4">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">Lead details</div>
            <div class="card-body">
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
                    <inertia-link
                      class="btn btn-warning"
                      :href="route('lead.list')"
                    >
                      Back</inertia-link
                    >
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <br /><br />
      <div class="row">
        <div class="col-md-12">
          <div class="card" v-if="lead.reminders.length > 0">
            <div class="card-header">Lead Reminders</div>
            <div class="card-body">
              <ul class="list-group list-group-flush">
                <li
                  class="list-group-item list-group-item-action"
                  v-for="reminder in lead.reminders"
                  :key="reminder.id"
                >
                  <div class="row">
                    <div class="col-md-6">{{ reminder.reminder }}</div>
                    <div class="col-md-2">{{ reminder.reminder_date }}</div>
                    <div class="col-md-2">
                      <strong>{{ reminder.status }}</strong>
                    </div>
                    <div class="col-md-2">
                      <inertia-link
                        :href="
                          route('reminder.view', {
                            lead: lead,
                            reminder: reminder,
                          })
                        "
                        class="float-right"
                      >
                        Go
                      </inertia-link>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="card" v-else>
            <div class="card-header">Lead Reminders</div>
            <div class="card-body">
              <inertia-link
                :href="route('reminder.add', { lead: lead })"
                class="btn btn-success"
                >Add new Reminder</inertia-link
              >
            </div>
          </div>
        </div>
      </div>
    </div>
  </layout>
</template>
<script>
import Layout from "../../Shared/Layout.vue";
export default {
  // take the property inside an object for the leads data
  props: {
    leadProp: Object,
  },
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
        interested_package: "",
      },
    };
  },
  // this created function will be executed first everytime a page refresh on this one it take the value of lead inside the data same to the property form the id
  created() {
    this.lead = this.leadProp;
  },
  // use this method to post the data that has been saved inside the form to the link or url
  methods: {
    async handleSubmit() {
      let response = await this.$inertia.post("/leads/update", this.lead);
    },
  },
};
</script>