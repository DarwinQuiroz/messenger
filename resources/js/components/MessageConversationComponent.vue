<template>
    <b-media :right-align="writtenByMe" vertical-align="center" class="mb-2">
      <b-img :src="image" rounded="circle" slot="aside" width="50" height="50" />
      <b-card>
          <slot></slot>
      </b-card>
    </b-media>
</template>

<script>
    export default {
        props: {
            image: String,
            writtenByMe: Boolean
        }
    }
</script>