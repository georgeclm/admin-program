<template>
  <layout>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>
            <inertia-link :href="route('lead.list')"> Leads </inertia-link>
            <span class="breadcrumb-sep">/</span>
            <!--Give the property id value because we have inside prop to go back to the lead-->
            <inertia-link :href="route('lead.view', { lead: lead })">
              Lead details
            </inertia-link>
            <span class="breadcrumb-sep">/</span>
            Update Reminder
          </h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">Add reminder</div>
            <div class="card-body">
              <!--For the reminder view it use a different first it still use reminderSubmit to store and take the data and then call the handleFormSubmit to save the changes to the database-->
              <reminder-form
                :mainReminder="reminder"
                :lead="lead"
                @reminderSubmit="handleFormSubmit"
                @addNewReminder="handleAddNewReminder"
              ></reminder-form>
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
  methods: {
    // it will execute 2 function the first one from the form component handleSubmit and then the form inside here
    handleFormSubmit(postData) {
      console.log(postData);
    },
    handleAddNewReminder(data) {
      const postData = {
        reminder_id: data.id,
      };
      this.$inertia.post(route("reminder.update"), postData);
    },
  },
};
</script>