<template>
  <q-layout view="hHh lpR fFf">
    <slot name="header"></slot>
    <slot name="left-drawer"></slot>

    <q-page-container>
      <q-page padding>
        <slot></slot>
      </q-page>
    </q-page-container>

  </q-layout>
</template>
