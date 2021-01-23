<template>
  <div>
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
    <div v-if="reminder.id">
      <button class="btn btn-success" @click="handleAddNewReminder">
        Follow Up
      </button>
      <inertia-link
        :href="route('reminder.note', { lead: lead, reminder: mainReminder })"
        class="btn btn-outline-danger"
      >
        Close Reminder
      </inertia-link>
    </div>

    <div v-else>
      <button class="btn btn-success" @click="handleSubmit">Save</button>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    mainReminder: Object,
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
    this.reminder = this.mainReminder;
  },

  methods: {
    handleSubmit() {
      // this emmit mean this function will happen only when the form for reminderSubmit is to store the reminder and the date inside the value
      this.$emit("reminderSubmit", this.reminder);
    },
    handleAddNewReminder() {
      this.$emit("addNewReminder", this.reminder);
    },
    handleCloseReminder() {
      this.$emit("closeReminder", this.reminder);
    },
  },
};
</script>