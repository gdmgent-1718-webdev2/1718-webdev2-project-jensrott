import { Injectable } from '@angular/core';

import { HttpClient } from '@angular/common/http';
import { HttpHeaders } from '@angular/common/http';

import { Observable } from 'rxjs/Observable';

import { Auction } from '../models/auction';
import { environment } from '../../../environments/environment';

@Injectable()
export class AuctionService {

  private _apiEndPointGet = environment.CyclingAPI.url + environment.CyclingAPI.auctionsEndPoints.get;

  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json',
      'enctype': 'multipart/form-data',
      'X-Requested-With': 'XMLHttpRequest'
    })
  };

  constructor(private _httpClient: HttpClient) { }

  getAuctions(): Observable<Array<Auction>> {
    return this._httpClient.get<Array<Auction>>(this._apiEndPointGet);
    }

  }
