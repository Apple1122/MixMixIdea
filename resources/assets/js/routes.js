import Login from './components/Login'
import CourseList from './components/CourseList'
import TWaiting from './components/TWaiting'
import SWaiting from './components/SWaiting'
import Loading from './components/loading'
<<<<<<< HEAD
import History from './components/History'
=======
import Gameroom_sixhat from './components/Gameroom_sixhat'
import Analysis from './components/Analysis'
>>>>>>> 6b58843a14f40cafcd34d5a2d8ee8617aa417f69

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
<<<<<<< HEAD
    path: '/history',
    component: History
  }

]
=======
    path: '/gameroom_sixhat',
    component: Gameroom_sixhat
  },
  {
    path: '/analysis',
    component: Analysis
  }



];
>>>>>>> 6b58843a14f40cafcd34d5a2d8ee8617aa417f69

export default routes