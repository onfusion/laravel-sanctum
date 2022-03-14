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
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>mobile</td>
                            <td>gender</td>
                            <td>age</td>
                            <td>city</td>
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
                employee: [],
                api: 'http://localhost:8000/api/employee'
            }
        },

        mounted() {
            // Fetch Api Data using axios
            console.log('Component mounted.')
            this.axios.get(this.api).then(res => {
                console.log('Api data fetched');
            });
        }
    }
</script>
