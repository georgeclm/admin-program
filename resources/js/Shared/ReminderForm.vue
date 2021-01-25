<template>
  <form @submit.prevent="handleSubmit">
    <div class="form-group">
      <label for="reminder">Reminder</label>
      <textarea
        name="reminder"
        id="reminder"
        class="form-control"
        v-model="reminder.reminder"
        required
      ></textarea>
    </div>
    <div class="form-group">
      <label for="date">Reminder date</label>
      <input
        type="date"
        name="date"
        id="date"
        class="form-control"
        v-model="reminder.reminder_date"
        required
      />
    </div>
    <button class="btn btn-success">Follow Up</button>
    <inertia-link
      :href="route('lead.view', { lead: lead })"
      class="btn btn-warning"
    >
      Back
    </inertia-link>
  </form>
</template>
<script>
export default {
  props: {
    propReminder: Object,
    lead: Object,
  },
  data() {
    return {
      reminder: {
        reminder: "",
        reminder_date: "",
      },
    };
  },
  created() {
    this.reminder = this.propReminder;
  },

  methods: {
    handleSubmit() {
      let postData = this.reminder;
      postData.lead_id = this.lead.id;
      // this emmit mean this function will happen only when the form for reminderSubmit is to store the reminder and the date inside the value
      this.$emit("reminderSubmit", postData);
    },
  },
};
</script>