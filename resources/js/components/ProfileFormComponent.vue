<template>
    <b-container >
        <b-form class="m-3" action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" :value="csrf">

            <b-form-group   label="Correo Electrónico:"
                            label-for="email">
                <b-form-input id="email"
                            type="email"
                            name="email"
                            v-model="user.email"
                            disabled
                            placeholder="Ingresa tu correo electrónico">
                </b-form-input>
            </b-form-group>

            <b-form-group   label="Nombre:"
                            label-for="name">
                <b-form-input id="name"
                            name="name"
                            type="text"
                            v-model="user.name"
                            required
                            placeholder="Ingresa tu nombre">
                </b-form-input>
            </b-form-group>

            <b-form-group   label="Nueva contraseña (sólo si se desea modificar):"
                            label-for="password">
                <b-form-input id="password"
                            type="password"
                            name="password"
                            v-model="user.password"
                            placeholder="Contaseña nueva">
                </b-form-input>
            </b-form-group>

            <b-form-group   label="Imágen de perfil:"
                            label-for="image">
                <b-img rounded="circle" :src="image" width="100" height="100" 
                        alt="Imágen de perfil" 
                        title="Imágen de perfil" class="m-1"/>

                <b-form-file id="image"
                            name="image"
                            placeholder="Selecciona una imágen">
                </b-form-file>
            </b-form-group>

            <b-button type="submit" variant="primary">Actualizar</b-button>
        </b-form>
    </b-container>
    
</template>

<script>
export default {
    props: {
        user: Object
    },
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },
    computed: {
        image() {
            return `/imgs/users/${this.user.image}`; 
        }
    },
}
</script>