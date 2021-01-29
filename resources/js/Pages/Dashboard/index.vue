<template>
  <layout>
    <div class="container">
      <div class="row mb-3">
        <div class="col-md-12">
          <div class="h2">Welcome {{ $page.props.auth.user.name }}</div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
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
