<template>
  <layout>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>
            <inertia-link :href="route('lead.list')"> Leads </inertia-link>
            <span class="breadcrumb-sep">/</span>
            <inertia-link :href="route('lead.view', { lead: lead })"
              >Lead Details</inertia-link
            >
            <span class="breadcrumb-sep">/</span>
            Add Reminder note
          </h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">Add note</div>
            <div class="card-body">
              <form @submit.prevent="handleAddNote">
                <label for="note">Note</label>
                <textarea
                  name="note"
                  id="note"
                  class="form-control"
                  v-model="note"
                  required
                ></textarea>
                <br />
                <button class="btn btn-success">Close</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </layout>
</template>
<script>
import Layout from "../../Shared/Layout.vue";
import ReminderForm from "../../Shared/ReminderForm.vue";

export default {
  props: {
    lead: Object,
    reminder: Object,
  },
  components: {
    Layout,
    ReminderForm,
  },
  data() {
    return {
      note: "",
    };
  },
  // use this method to post the data that has been saved inside the form to the link or url

  methods: {
    // to hanndle the form action take the data and send the post inside the reminder save name on the web.php
    handleAddNote() {
      const postData = {
        reminder_id: this.reminder.id,
        note: this.note,
      };
      this.$inertia.post(route("reminder.close"), postData);
    },
  },
};
</script>