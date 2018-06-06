import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import 'rxjs/add/operator/first';

import {AuthenticationService} from '../../../core/services/authentication.service';


@Component({
  selector: 'app-noaccount-page',
  templateUrl: './noaccount-page.component.html',
  styleUrls: ['./noaccount-page.component.scss']
})
export class NoAccountPageComponent implements OnInit {
  user: any = {};
  returnUrl: string;
  error = '';

    public ErrorMsg = '';

  constructor(
    private route: ActivatedRoute,
        private router: Router,
        private authenticationService: AuthenticationService) { }

  ngOnInit() {
    // reset login status
          this.authenticationService.logout();
    // get return url from route parameters or default to '/'
          this.returnUrl = this.route.snapshot.queryParams['returnUrl'] || '/create';
      }

    login() {
        this.authenticationService.login(this.user.email, this.user.password)
            .first()
            .subscribe(
                data => {
                    this.router.navigate([this.returnUrl]);
                    console.log('Login Succesfull');
                    console.log(data);
                    this.authenticationService.getCurrentUserId();
                    this.ErrorMsg = 'Login Succesvol ';
                },
                error => {
                    this.error = error;
                    this.ErrorMsg = 'Login Gefaald ! ';
                });

    }
  
  

  

}
