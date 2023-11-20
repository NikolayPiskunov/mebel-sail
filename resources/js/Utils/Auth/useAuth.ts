import {router} from "@inertiajs/vue3";

export default function () {
  const useLogout = () => {
    // TODO:: потом сделать что то вроде app.confirm(modals.logout) для показа окна подтверждения
    router.post(route('logout'));
  }

  return {
    useLogout
  };
}
