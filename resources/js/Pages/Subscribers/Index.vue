<template>
  <layout>
    <div class="container">
      <div class="d-flex row mb-3">
        <div class="col-md-12">
          <div class="float-left h2">Subscribers</div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-12">
          <form
            class="form-inline"
            method="get"
            :action="route('subscriber.list')"
          >
            <input
              type="text"
              class="form-control mr-3 col-sm-4"
              placeholder="Search subscribers"
              name="search"
            />
            <select
              name="package_search"
              id="search=package"
              class="form-control col-sm-2 mr-3"
            >
              <option value="0" selected>All</option>
              <option value="3">Yearly Package</option>
              <option value="2">Half yearly Package</option>
              <option value="1">Monthly Package</option>
            </select>
            <button class="btn btn-outline-primary mr-3">Filter</button>
            <a :href="route('subscriber.list')" class="btn btn-outline-danger"
              >Reset</a
            >
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <table class="table table-bordered bg-white">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Age</th>
              <th>Date of Birth</th>
              <th>Package</th>
              <th>Renewal On</th>
              <th></th>
            </tr>
            <tr v-for="subscriber in subscribers" :key="subscriber.id">
              <!-- for loop inside inertia js using v-for inside the class-->
              <td v-if="subscriber.added_by == user">{{ subscriber.id }}</td>
              <td v-if="subscriber.added_by == user">
                <inertia-link href="#">{{ subscriber.name }}</inertia-link>
              </td>
              <td v-if="subscriber.added_by == user">{{ subscriber.email }}</td>
              <td v-if="subscriber.added_by == user">{{ subscriber.phone }}</td>
              <td v-if="subscriber.added_by == user">{{ subscriber.age }}</td>
              <td v-if="subscriber.added_by == user">{{ subscriber.dob }}</td>
              <td v-if="subscriber.added_by == user">
                {{ subscriber.interested_package }}
              </td>
              <td v-if="subscriber.added_by == user">
                {{ subscriber.renewal_date }}
              </td>
              <td v-if="subscriber.added_by == user">
                <!-- This is for routing using ziggs by taking the id inside this table and this use the name inside the web.php the name for the view is lead.view inside web -->
                <inertia-link href="#"> Go </inertia-link>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </layout>
</template>
<script>
import Layout from "../../Shared/Layout.vue";

export default {
  components: {
    Layout,
  },
  props: ["subscribers", "user"],
};
</script>