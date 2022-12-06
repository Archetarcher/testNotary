<template>
  <div class="container p-2">
    <div class="card">
      <div class="card-body">
          <div class="form-group">
            <label for="example1">Name</label>
            <input v-model="newRecord.first_name" type="text" class="form-control" id="example1">
          </div>
          <div class="form-group">
            <label for="example2">Lastname </label>
            <input v-model="newRecord.last_name" type="text" class="form-control" id="example2">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input v-model="newRecord.email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Example select</label>
            <select v-model="newRecord.type" class="form-control" id="exampleFormControlSelect1">
              <option  :value="type.id" v-for="type of types">{{type.name}}</option>
            </select>
          </div>
          <div class="form-group">
            <label >Date</label>
            <datepicker
                v-model="newRecord.date"
                :clearable="true"
            />
          </div>


          <button v-on:click="saveRecord" type="submit" class="btn btn-primary">Submit</button>

      </div>

    </div>
    <table class="table">
      <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Email</th>
        <th scope="col">date</th>
        <th scope="col">type</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="record of records">
        <th scope="row">{{record.id}}</th>
        <td>{{record.first_name}}</td>
        <td>{{record.last_name}}</td>
        <td>{{record.email}}</td>
        <td>{{record.date}}</td>
        <td>{{record.recordType}}</td>
      </tr>

      </tbody>
    </table>
  </div>
</template>

<script>
import Datepicker from 'vue3-datepicker/src/datepicker/Datepicker.vue'

export default {
  name: "HomeComponent",
  components: [Datepicker],
  data(){
    return {
      records: [],
      newRecord: {
        first_name: '',
        last_name: '',
        email: '',
        type: null,
        date: new Date(),
      },
      types: [
        {
          id: 1,
          name: 'доверенность'
        },
        {
          id: 2,
          name: 'наследство'
        },
        {
          id: 3,
          name: 'справка'
        }
      ]
    }
  },
  mounted() {
  this.fetchData();
  },
  methods: {
    fetchData(){
      axios.get('/api/records').then(data => {
        console.log(data);
        this.records = data.data;
      }).catch(err => {
        console.log(err);
      })
    },
    async saveRecord() {
      const record = {
        ...this.newRecord
      }
      record.date = record.date.toISOString().split('T')[0]

      await axios.post('/api/records', record).then(data => {
        console.log(data);
        this.records.push(data.data)
      }).catch(err => {
        console.log(err);
      })

    },
  }
}
</script>

<style scoped>
.form-group{
  margin: 5px;
}
</style>