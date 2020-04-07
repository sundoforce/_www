/// <reference types="./types" />
import { MenuItem } from "./MenuItem";
export declare const setEditMode: (vditor: IVditor, type: string, event: string | Event) => void;
export declare class EditMode extends MenuItem {
    element: HTMLElement;
    panelElement: HTMLElement;
    constructor(vditor: IVditor, menuItem: IMenuItem);
    _bindEvent(vditor: IVditor): void;
}
