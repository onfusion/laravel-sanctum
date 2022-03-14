<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Employee List</h4>
            </div>

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>mobile</th>
                            <th>gender</th>
                            <th>age</th>
                            <th>city</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="(employee, index) in employees" :key="index">
                            <td>{{employee.id}}</td>
                            <td>{{employee.name}}</td>
                            <td>{{employee.email}}</td>
                            <td>{{employee.mobile}}</td>
                            <td>{{employee.gender}}</td>
                            <td>{{employee.age}}</td>
                            <td>{{employee.city}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                employees: [],
                api: 'http://localhost:8000/api/employee'
            }
        },

        mounted() {
            // Fetch Api Data using axios
            console.log('Component mounted.')
            this.axios.get(this.api).then(res => {
                // console.log(res);
                this.employees = res.data;
            });
        }
    }
</script>
