import Login from './components/Login'
import CourseList from './components/CourseList'
import TWaiting from './components/TWaiting'
import SWaiting from './components/SWaiting'
import Loading from './components/loading'
import History from './components/History'
import Gameroom_sixhat from './components/Gameroom_sixhat'
import Analysis from './components/Analysis'
import Vote from './components/Vote'
import Gameroom from './components/Gameroom'
import Groupfight from './components/Groupfight'

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
  },
  {
    path: '/vote',
    component: Vote
  },
  {
    path: '/gameroom',
    component: Gameroom
  },
  {
    path: '/groupfight',
    component: Groupfight
  }

];

export default routes