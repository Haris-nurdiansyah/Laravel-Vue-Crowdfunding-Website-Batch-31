
export const UsersComponent = {
    template: `
        <div class="usersList">

            <ul>

                <li v-for="(user , index) in users" :key="index">

                    {{ user.name }} ||

                    <button @click="$emit('user_edit_selected', index)">Edit</button>

                    <button @click="$emit('user_delete_selected', index)">Delete</button>

                </li>

            </ul>

        </div>
    `,
    props: ['users'],
}