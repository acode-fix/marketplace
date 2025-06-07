import{getToken} from './helper/helper.js';
import { checkUserSettingStatus } from './user/user-setting-status.js';
const token = getToken();
checkUserSettingStatus();