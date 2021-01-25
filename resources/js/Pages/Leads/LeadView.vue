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
      <div class="card">
        <div class="card-header">Lead details</div>
        <div class="card-body">
          <lead-form
            @formSubmit="handleSubmit"
            :main-lead="lead"
            :packages="packages"
          ></lead-form>
        </div>
      </div>
      <div class="card mt-3" v-if="lead.reminders.length > 0">
        <div class="card-header">Reminders</div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <inertia-link
                class="btn btn-success float-right mb-2"
                :href="route('reminder.add', { lead: leadProp })"
              >
                Add a Reminder
              </inertia-link>
            </div>
          </div>
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
      <div class="card mt-3" v-if="lead.reminders.length == 0">
        <div class="card-header">Reminders</div>
        <div class="card-body d-flex justify-content-center">
          <inertia-link
            :href="route('reminder.add', { lead: leadProp })"
            class="btn btn-success"
            >Add a Reminder</inertia-link
          >
        </div>
      </div>
    </div>
  </layout>
</template>
<script>
import Layout from "../../Shared/Layout.vue";
import LeadForm from "../../Shared/LeadForm.vue";

export default {
  // take the property inside an object for the leads data
  props: {
    leadProp: Object,
    packages: Array,
  },
  components: {
    Layout,
    LeadForm,
  },
  data() {
    return {
      lead: {
        name: "",
        email: "",
        phone: "",
        dob: "",
        package: "",
      },
    };
  },
  // this created function will be executed first everytime a page refresh on this one it take the value of lead inside the data same to the property form the id
  created() {
    this.lead = this.leadProp;
  },
  // use this method to post the data that has been saved inside the form to the link or url
  methods: {
    async handleSubmit(lead) {
      let response = await this.$inertia.post("/leads/update", lead);
    },
  },
};
</script>