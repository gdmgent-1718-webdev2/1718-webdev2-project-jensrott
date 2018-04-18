import { Injectable } from '@angular/core';

import { HttpClient } from '@angular/common/http';
import { HttpHeaders } from '@angular/common/http';
/*
import { HttpClientModule } from '@angular/common/http';
import { HttpModule } from '@angular/http';
*/

import { Observable } from 'rxjs/Observable';
import { catchError, retry } from 'rxjs/operators';

import { User } from '../models/user';
import { environment } from '../../../environments/environment';

@Injectable()
export class UserService {
  serverUrl = 'http://127.0.0.1:8000';

  options: any;

  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json',
      enctype: 'multipart/form-data',
      'X-Requested-With': 'XMLHttpRequest'
    })
  };

  // Login, register with laravel
  constructor(private _httpClient: HttpClient) {
    /*
    this.headers.append('enctype', 'multipart/form-data');
    this.headers.append('Content-Type', 'application/json');
    this.headers.append('X-Requested-With', 'XMLHttpRequest');
    this.options = new RequestOptions({headers: this.headers});
    */
  }

  addProfile(user: User) {
    // const data = JSON.stringify(info);
    return this._httpClient.post(
      this.serverUrl + 'create profile',
      user,
      this.httpOptions
    );

    /*.pipe(
        catchError(this.handleError('addHero', user))
      );
      */
  }
}
