<template>
  <layout>
    <div class="container">
      <div class="row mb-3">
        <div class="col-md-12">
          <p>Welcome {{ $page.props.auth.user.name }}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <reminder-list :reminders="reminders"></reminder-list>
        </div>
      </div>
    </div>
  </layout>
</template>
<script>
import Layout from "../../Shared/Layout.vue";
import ReminderList from "./ReminderList.vue";

export default {
  components: {
    Layout,
    ReminderList,
  },
  props: ["reminders"],
};
</script>
