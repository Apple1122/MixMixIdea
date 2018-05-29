import Login from './components/Login'
import CourseList from './components/CourseList'
import TWaiting from './components/TWaiting'
import SWaiting from './components/SWaiting'
import Loading from './components/loading'

const routes = [{
    path: '/',
    component: Login
  },
  {
    path: '/courselist',
    component: CourseList
  },
  {
    path: '/s_waiting',
    component: SWaiting
  },
  {
    path: '/t_waiting',
    component: TWaiting
  }
]

export default routes