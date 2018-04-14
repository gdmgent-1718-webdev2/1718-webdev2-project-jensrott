import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs/Observable';

import { User } from '../models/user';
import { environment } from '../../../environments/environment';

@Injectable()
export class UserService {

  // Login, register with laravel
  constructor(private _httpClient: HttpClient) { }

}
