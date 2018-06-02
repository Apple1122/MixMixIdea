import Login from './components/Login'
import CourseList from './components/CourseList'
import TWaiting from './components/TWaiting'
import SWaiting from './components/SWaiting'
import Loading from './components/loading'
import History from './components/History'
import Gameroom_sixhat from './components/Gameroom_sixhat'
import Analysis from './components/Analysis'

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
  },
  {
    path: '/history',
    component: History
  },
  {
    path: '/gameroom_sixhat',
    component: Gameroom_sixhat
  },
  {
    path: '/analysis',
    component: Analysis
  }
];

export default routes