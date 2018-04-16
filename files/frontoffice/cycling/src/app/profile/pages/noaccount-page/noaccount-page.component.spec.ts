import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { NoAccountPageComponent } from './noaccount-page.component';

describe('NoAccountPageComponent', () => {
  let component: NoAccountPageComponent;
  let fixture: ComponentFixture<NoAccountPageComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ NoAccountPageComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(NoAccountPageComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
