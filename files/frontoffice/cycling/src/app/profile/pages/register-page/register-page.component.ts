import { Component, OnInit, Input } from '@angular/core';
import { User } from '../../../core/models/user';
import { UserService } from '../../../core/services/user.service';

@Component({
  selector: 'app-register-page',
  templateUrl: './register-page.component.html',
  styleUrls: ['./register-page.component.scss']
})
export class RegisterPageComponent implements OnInit {
  private users: Array<User>; // array to store existing list of users -- first user is now in the heading of the form
  private user: User = {
    // temporarily limited to a subset of fields
    id: '',
    user_name: '',
    first_name: 'TBD',
    last_name: 'TBD',
    email: '',
    password: '',
    address_street: 'TBD',
    address_number: 1,
    address_postcode: 9230,
    address_location: 'TBD',
    address_country: 'TBD'
    // address: '',
  };
  private repeat_password: string = '';
  private ErrorMsg: string = '';

  submitted = false;
  passwordMatch = true;
  private passwordCheckMessage = '';

  onSubmit() {
    this.submitted = true;
  }

  constructor(private userService: UserService) {}

  ngOnInit() {
    //  this.getUsers();
    //  this.getSpecificUser();
  }

  checkPassword() {
    this.passwordMatch = false;
    this.passwordCheckMessage = 'Wachtwoorden zijn niet gelijk !!';
    if (this.user.password === this.repeat_password) {
      this.passwordMatch = true;
      this.passwordCheckMessage = 'Wachtwoorden zijn gelijk !';
    }
  }

  // Call our api through the service

  addUser() {
    this.userService
      .addUser(this.user)
      .first()
      .subscribe(
        res => {
          console.log(res);
          //  this.authenticationService.getCurrentUserId();
          this.ErrorMsg = 'Registratie en Login Geslaagd ';
        },
        error => {
          this.ErrorMsg = 'Registratie en Login Gefaald';
        }
      );
  }
}
